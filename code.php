<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Collapsible Chat Demo</title>
  <!-- Bootstrap CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <?php include 'externalphp/head.php'; ?>
</head>
<body>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8 col-lg-6">
        <div class="chat-container card">
          <div class="chat-header card-header d-flex justify-content-between align-items-center">
            <div>
              <h2 class="mb-2">Collapsible Chat Demo</h2>
              <div class="username-input">
                <input type="text" class="form-control form-control-sm" id="username" placeholder="Enter your username" maxlength="20">
              </div>
            </div>
            <button class="collapse-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#chatBody" aria-expanded="true" aria-controls="chatBody">
              <i class="bi bi-chevron-up"></i> <!-- Bootstrap Icons for arrow; add CDN if needed -->
            </button>
          </div>
          <div id="chatBody" class="collapse show">
            <div id="messages" class="messages card-body"></div>
            <div class="chat-input">
              <div class="input-group">
                <input type="text" class="form-control" id="messageInput" placeholder="Type a message..." maxlength="200">
                <button class="btn btn-success" id="sendButton" type="button">Send</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS CDN (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <!-- Optional: Bootstrap Icons CDN for the collapse arrow -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <script>
    const messagesDiv = document.getElementById('messages');
    const messageInput = document.getElementById('messageInput');
    const sendButton = document.getElementById('sendButton');
    const usernameInput = document.getElementById('username');
    const collapseToggle = document.querySelector('.collapse-toggle');

    let username = localStorage.getItem('chatUsername') || 'Anonymous';
    let messages = JSON.parse(localStorage.getItem('chatMessages')) || [];

    // Set initial username
    usernameInput.value = username;
    usernameInput.addEventListener('change', (e) => {
      username = e.target.value || 'Anonymous';
      localStorage.setItem('chatUsername', username);
    });

    // Toggle icon on collapse (optional enhancement)
    const collapseElement = new bootstrap.Collapse(document.getElementById('chatBody'), { toggle: false });
    collapseToggle.addEventListener('click', () => {
      const icon = collapseToggle.querySelector('i');
      if (collapseElement._isShown()) {
        icon.classList.remove('bi-chevron-up');
        icon.classList.add('bi-chevron-down');
      } else {
        icon.classList.remove('bi-chevron-down');
        icon.classList.add('bi-chevron-up');
      }
    });

    // Load messages on start
    function loadMessages() {
      messagesDiv.innerHTML = '';
      messages.forEach(addMessageToDOM);
      messagesDiv.scrollTop = messagesDiv.scrollHeight;
    }

    // Add message to DOM
    function addMessageToDOM(message) {
      const messageEl = document.createElement('div');
      messageEl.classList.add('message');
      messageEl.innerHTML = `<strong>${message.user}:</strong> ${message.text} <small>${message.timestamp}</small>`;
      messagesDiv.appendChild(messageEl);
    }

    // Send message
    function sendMessage() {
      const text = messageInput.value.trim();
      if (!text) return;

      const timestamp = new Date().toLocaleTimeString();
      const message = { user: username, text, timestamp };

      messages.push(message);
      localStorage.setItem('chatMessages', JSON.stringify(messages));

      addMessageToDOM(message);
      messageInput.value = '';
      messagesDiv.scrollTop = messagesDiv.scrollHeight;
    }

    // Event listeners
    sendButton.addEventListener('click', sendMessage);
    messageInput.addEventListener('keypress', (e) => {
      if (e.key === 'Enter') sendMessage();
    });

    // Initial load
    loadMessages();
  </script>
</body>
</html>
