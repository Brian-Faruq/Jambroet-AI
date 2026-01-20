<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>JAMBRUT AI Futuristic</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: "Inter", sans-serif; }

    body {
      background: radial-gradient(circle at 20% 20%, #050510, #000);
      color: #fff;
      display: flex;
      flex-direction: column;
      height: 100vh;
      overflow: hidden;
      position: relative;
    }

    /* 🌌 ANIMASI BACKGROUND FUTURISTIK */
    .bg-anim {
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, #0ff, #0072ff, #ff00f7, #00ff9d);
      background-size: 400% 400%;
      animation: moveGradient 10s ease infinite;
      filter: blur(120px);
      opacity: 0.2;
      z-index: 0;
    }

    /* TITLE */
    @keyframes moveGradient {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@600&display=swap');

    .title {
      position: relative;
      z-index: 3;
      text-align: center;
      font-family: 'Orbitron', sans-serif;
      font-size: 28px;
      color: #00f7ff;
      text-shadow: 0 0 12px #00f7ff, 0 0 25px #7700ff;
      letter-spacing: 3px;
      margin-top: 25px;
      animation: glowPulse 2s infinite alternate;
    }

    @keyframes glowPulse {
      from { text-shadow: 0 0 10px #00f7ff, 0 0 25px #7700ff; }
      to { text-shadow: 0 0 25px #00fff2, 0 0 45px #c000ff; }
    }

    /* 💬 AREA CHAT */
    .chat-container {
      flex: 1;
      overflow-y: auto;
      padding: 30px 20px 120px;
      display: flex;
      flex-direction: column;
      gap: 18px;
      z-index: 2;
      scroll-behavior: smooth;
    }

    .message {
      max-width: 75%;
      padding: 14px 18px;
      border-radius: 16px;
      line-height: 1.6;
      font-size: 15px;
      word-wrap: break-word;
      animation: fadeIn 0.3s ease-in-out;
    }

    .message img {
      max-width: 20px;
      border-radius: 10px;
      margin-top: 10px;
      display: block;
      object-fit: cover;
      box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
    }

    .user {
      align-self: flex-end;
      background: linear-gradient(135deg, #00c6ff, #0072ff);
      color: #fff;
      border-bottom-right-radius: 4px;
      box-shadow: 0 4px 10px rgba(0, 115, 255, 0.4);
    }

    .ai {
      align-self: flex-start;
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(6px);
      color: #e5e5e5;
      border-bottom-left-radius: 4px;
      box-shadow: 0 4px 10px rgba(255, 255, 255, 0.05);
    }

    /* 🧠 Input Area */
    .input-container {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      background: rgba(10, 10, 15, 0.85);
      backdrop-filter: blur(10px);
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      padding: 16px 24px;
      display: flex;
      flex-direction: column;
      z-index: 3;
    }

    .input-row {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .upload-btn {
      background: none;
      border: none;
      color: #888;
      font-size: 24px;
      cursor: pointer;
      transition: 0.2s;
    }

    .upload-btn:hover { color: #00c6ff; transform: scale(1.1); }

    .input-box {
      flex: 1;
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 14px;
      padding: 14px 16px;
      color: #fff;
      font-size: 15px;
      outline: none;
      resize: none;
      height: 48px;
      transition: 0.2s;
    }

    .input-box:focus {
      border-color: #00c6ff;
      background: rgba(255, 255, 255, 0.08);
    }

    .send-btn {
      background: linear-gradient(135deg, #00c6ff, #0072ff);
      border: none;
      color: #fff;
      padding: 14px 20px;
      border-radius: 12px;
      cursor: pointer;
      transition: 0.25s;
      font-weight: 600;
      font-size: 15px;
    }

    .send-btn:hover {
      transform: scale(1.05);
      box-shadow: 0 0 12px #007bff;
    }

    /* Preview */
    .preview {
      margin-top: 10px;
      display: none;
      justify-content: flex-start;
      align-items: center;
      gap: 10px;
    }

    .preview img {
      height: 70px;
      border-radius: 8px;
      object-fit: cover;
      border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .remove-preview {
      cursor: pointer;
      color: #ff4d4d;
      font-size: 18px;
      font-weight: bold;
    }

    /* Animasi */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(8px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 600px) {
      .message { max-width: 90%; }
      .input-container { padding: 12px 16px; }
    }

    /* ✍️ Typing Indicator */
    .typing {
      display: inline-flex;
      align-items: center;
      gap: 4px;
    }

    .typing-dot {
      width: 6px;
      height: 6px;
      background: #aaa;
      border-radius: 50%;
      animation: blink 1.2s infinite ease-in-out;
    }

    .typing-dot:nth-child(2) { animation-delay: 0.2s; }
    .typing-dot:nth-child(3) { animation-delay: 0.4s; }

    @keyframes blink {
      0%, 80%, 100% { opacity: 0.2; transform: translateY(0); }
      40% { opacity: 1; transform: translateY(-2px); }
    }
  </style>
</head>
<body>
  <div class="bg-anim"></div>

  <div class="title">⚡ <u><b>JAMBRUT AI</b></u> ⚡</div>

  <div class="chat-container" id="chatContainer">
    <div class="message ai">Halo! Aku <b>JAMBRUT AI</b> 🤖. Siap bantu kamu hari ini!</div>
  </div>

  <form class="input-container" id="chatForm" enctype="multipart/form-data">
    <div class="input-row">
      <button type="button" class="upload-btn" id="uploadBtn">+</button>
      <input type="file" id="fileInput" name="file" style="display:none" accept="image/*" />
      <textarea id="userInput" class="input-box" placeholder="Ketik pesan di sini..."></textarea>
      <button type="submit" class="send-btn">Kirim</button>
    </div>
    <div class="preview" id="previewBox">
      <img id="previewImg" src="" alt="Preview">
      <span class="remove-preview" id="removePreview">&times;</span>
    </div>
  </form>

  <script>
    const chatContainer = document.getElementById('chatContainer');
    const form = document.getElementById('chatForm');
    const input = document.getElementById('userInput');
    const fileInput = document.getElementById('fileInput');
    const uploadBtn = document.getElementById('uploadBtn');
    const previewBox = document.getElementById('previewBox');
    const previewImg = document.getElementById('previewImg');
    const removePreview = document.getElementById('removePreview');

    uploadBtn.onclick = () => fileInput.click();

    fileInput.onchange = () => {
      if (fileInput.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
          previewImg.src = e.target.result;
          previewBox.style.display = 'flex';
        };
        reader.readAsDataURL(fileInput.files[0]);
      }
    };

    removePreview.onclick = () => {
      fileInput.value = '';
      previewBox.style.display = 'none';
      previewImg.src = '';
    };

    input.addEventListener('keydown', e => {
      if (e.key === 'Enter' && !e.shiftKey) {
        e.preventDefault();
        form.dispatchEvent(new Event('submit'));
      }
    });

    form.onsubmit = async e => {
      e.preventDefault();
      const text = input.value.trim();
      const file = fileInput.files[0];
      if (!text && !file) return;

      let html = text ? text.replace(/\n/g, "<br>") : "";
      if (file) {
        const fileURL = URL.createObjectURL(file);
        html += `<img src="${fileURL}" alt="user image">`;
      }
      addMessage(html, "user");

      input.value = "";
      fileInput.value = "";
      previewBox.style.display = "none";

      const typing = showTyping();
      const formData = new FormData();
      formData.append("message", text);
      if (file) formData.append("file", file);

      const res = await fetch("chat.php", { method: "POST", body: formData });
      const reply = await res.text();
      chatContainer.removeChild(typing);
      await typeEffect(reply, "ai");
    };

    function addMessage(content, sender) {
      const msg = document.createElement("div");
      msg.classList.add("message", sender);
      msg.innerHTML = content;
      chatContainer.appendChild(msg);
      chatContainer.scrollTop = chatContainer.scrollHeight;
    }

    function showTyping() {
      const typing = document.createElement("div");
      typing.classList.add("message", "ai");
      typing.innerHTML = `
        <div class="typing">
          <div class="typing-dot"></div>
          <div class="typing-dot"></div>
          <div class="typing-dot"></div>
        </div>`;
      chatContainer.appendChild(typing);
      chatContainer.scrollTop = chatContainer.scrollHeight;
      return typing;
    }

    async function typeEffect(text, sender) {
      const msg = document.createElement("div");
      msg.classList.add("message", sender);
      chatContainer.appendChild(msg);
      for (let i = 0; i < text.length; i++) {
        msg.innerHTML += text[i];
        if (i % 3 === 0) await new Promise(r => setTimeout(r, 5)); // kecepatan ngetik cepat
        chatContainer.scrollTop = chatContainer.scrollHeight;
      }
    }
  </script>
</body>
</html>
