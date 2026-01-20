<?php
$apiKey = "AIzaSyB7UHWYJPmBv6uKGXzg-UPjlG7_qq3CFQY"; // 🔑 ganti dengan punyamu

$userMessage = trim($_POST['message'] ?? '');
$fileData = $_FILES['file'] ?? null;

// kalau tidak ada input sama sekali
if ($userMessage === '' && !$fileData) {
  echo "⚠️ Kirim teks atau file dulu ya.";
  exit;
}

$url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=" . $apiKey;

$parts = [];
if ($userMessage !== '') {
  $parts[] = ["text" => $userMessage];
}

if ($fileData && $fileData['error'] === UPLOAD_ERR_OK) {
  $mimeType = mime_content_type($fileData['tmp_name']);
  $base64 = base64_encode(file_get_contents($fileData['tmp_name']));

  if (strpos($mimeType, 'image/') === 0) {
    $parts[] = [
      "inline_data" => [
        "mime_type" => $mimeType,
        "data" => $base64
      ]
    ];
  } else {
    // untuk file teks / pdf / docx: ubah jadi teks isi file
    $content = file_get_contents($fileData['tmp_name']);
    $parts[] = ["text" => "Berikut isi file yang diunggah:\n\n" . substr($content, 0, 2000)];
  }
}

$data = [ "contents" => [ ["parts" => $parts] ] ];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
  'Content-Type: application/json',
  'Accept: application/json'
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);
$err = curl_error($ch);
curl_close($ch);

if ($err) {
  echo "⚠️ Gagal: $err";
  exit;
}

$result = json_decode($response, true);

if (isset($result['candidates'][0]['content']['parts'][0]['text'])) {
  echo htmlspecialchars($result['candidates'][0]['content']['parts'][0]['text'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
} else {
  echo "⚠️ Tidak ada respons dari AI.";
}
?>
