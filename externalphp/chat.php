<style>
    /* Chatbot-specific styles */
    .chat-widget {
        position: fixed;
        bottom: 80px; /* Adjusted to be above the input area */
        right: 20px;
        width: 350px;
        height: 500px;
        background: white;
        border-radius: 15px 15px 10px 10px ;
        box-shadow: 0 4px 20px rgba(0,0,0,0.2);
        display: flex;
        flex-direction: column;
        z-index: 999999;
        transition: height 0.3s ease; /* Smooth open/close */
    }
    .chat-widget.minimized {
        border-radius: 15px 15px 0px 0px ;
        height: 80px;
    }
    .chat-header {
        background: var(--kld-green);
        color: white;
        padding: 10px;
        border-radius: 10px 10px 0 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
        flex-shrink: 0; /* Prevent shrinking */
    }
    .toggle-btn {
        background: none;
        border: none;
        color: white;
        font-size: 18px;
        cursor: pointer;
    }
    .chat-box {
        flex: 1;
        overflow-y: auto;
        padding: 10px;
        background: #fafafa;
        border-bottom: 1px solid #ccc;
    }
    .message {
        margin-bottom: 10px;
        padding: 8px;
        border-radius: 5px;
        animation: fadeIn 0.5s ease-in; /* Fade-in animation for messages */
    }
    .bot {
        background: #ffffffff;
        color: #000000ff;
        text-align: left;
    }
    .user {
        background: #c8e6c9;
        color: #2e7d32;
        text-align: right;
    }
    .loading {
        display: flex;
        align-items: center;
    }
    .dot {
        display: inline-block;
        width: 8px;
        height: 8px;
        background-color: #000000ff;
        border-radius: 50%;
        margin-left: 4px;
        animation: bounce 1.4s infinite ease-in-out both;
    }
    .dot:nth-child(1) { animation-delay: -0.32s; }
    .dot:nth-child(2) { animation-delay: -0.16s; }
    .dot:nth-child(3) { animation-delay: 0s; }
    .input-area {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 350px;
        display: flex;
        padding: 10px;
        background: white;
        border: none;
        border-radius: 0 0 10px 10px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.2);
        z-index: 999998; /* Below widget */
    }
    .input-area input {
        flex: 1;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .input-area button {
        padding: 10px;
        background: #43484dff;
        color: white;
        border: none;
        border-radius: 5px;
        margin-left: 5px;
        cursor: pointer;
    }
    .input-area button:hover:not(:disabled) {
        background: #62ad1bff;
    }
    .input-area button:disabled {
        background: #ccc;
        cursor: not-allowed;
    }
    .input-area input:disabled {
        background: #f5f5f5;
        cursor: not-allowed;
    }
    /* Animations */
    @keyframes bounceIn {
        0% { transform: scale(0.3); opacity: 0; }
        50% { transform: scale(1.05); }
        70% { transform: scale(0.9); }
        100% { transform: scale(1); opacity: 1; }
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {
            transform: translateY(0);
        }
        40% {
            transform: translateY(-10px);
        }
        60% {
            transform: translateY(-5px);
        }
    }
    /* Mobile responsiveness */
    @media (max-width: 600px) {
        .chat-widget {
            width: 90%;
            height: 400px;
            bottom: 80px;
            right: 10px;
        }
        .chat-widget.minimized {
            height: 110px; /* Adjust for mobile */
        }
        .input-area {
            width: 90%;
            right: 10px;
        }
    }
</style>

<div id="chat-widget" class="chat-widget minimized">
    <div class="chat-header" onclick="toggleChat()">
        <img src="Resources/4.png" alt="Logo" style="height:45px; width:fit-content; margin-right:10px;">
        <button class="toggle-btn" id="toggle-icon">+</button>
    </div>
    <div id="chat-box" class="chat-box" style="display: none;">
        <div class="message bot">Bot: Hello! I'm Gemnini AI. Ask me something!</div>
    </div>
    
<div id="input-area" class="input-area">
    <input type="text" id="user-input" placeholder="Type your message..." />
    <button id="send-btn" onclick="sendMessage()">Send</button>
</div>
    

</div>


<script>
    let isMinimized = true;

    function toggleChat() {
        const widget = document.getElementById('chat-widget');
        const chatBox = document.getElementById('chat-box');
        const toggleIcon = document.getElementById('toggle-icon');
        isMinimized = !isMinimized;
        if (isMinimized) {
            widget.classList.add('minimized');
            chatBox.style.display = 'none';
            toggleIcon.textContent = '+';
        } else {
            widget.classList.remove('minimized');
            chatBox.style.display = 'block';
            toggleIcon.textContent = '−';
        }
    }

    async function sendMessage() {
        const input = document.getElementById('user-input');
        const sendBtn = document.getElementById('send-btn');
        const chatBox = document.getElementById('chat-box');
        const userMessage = input.value.trim();

        if (userMessage === '' || sendBtn.disabled) return;

        // If minimized, maximize the widget
        if (isMinimized) {
            toggleChat();
        }

        // Disable input and button
        input.disabled = true;
        sendBtn.disabled = true;

        // Add user message to chat
        const userDiv = document.createElement('div');
        userDiv.className = 'message user';
        userDiv.textContent = 'You: ' + userMessage;
        chatBox.appendChild(userDiv);

        // Add loading message with bouncing dots
        const loadingDiv = document.createElement('div');
        loadingDiv.className = 'message bot loading';
        loadingDiv.id = 'loading-message';
        loadingDiv.innerHTML = 'Bot: Processing...<span class="dot"></span><span class="dot"></span><span class="dot"></span>';
        chatBox.appendChild(loadingDiv);

        // Scroll to bottom
        chatBox.scrollTop = chatBox.scrollHeight;

        // Clear input
        input.value = '';

        try {
            // Generate bot response (async, so await it)
            const botResponse = await generateResponse(userMessage);

            // Remove loading message
            const loadingMsg = document.getElementById('loading-message');
            if (loadingMsg) loadingMsg.remove();

            // Add bot response
            const botDiv = document.createElement('div');
            botDiv.className = 'message bot';
            botDiv.textContent = 'Bot: ' + botResponse;
            chatBox.appendChild(botDiv);
        } catch (error) {
            console.error('Error in sendMessage:', error);

            // Remove loading message
            const loadingMsg = document.getElementById('loading-message');
            if (loadingMsg) loadingMsg.remove();

            // Add error message
            const errorDiv = document.createElement('div');
            errorDiv.className = 'message bot';
            errorDiv.textContent = 'Bot: Sorry, an error occurred. Check the console.';
            chatBox.appendChild(errorDiv);
        }

        // Scroll to bottom again
        chatBox.scrollTop = chatBox.scrollHeight;

        // Re-enable input and button
        input.disabled = false;
        sendBtn.disabled = false;
        input.focus(); // Optional: focus back to input
    }

    async function generateResponse(message) {
        try {
            const response = await fetch('externalphp/process.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams({ message: message })
            });
            const data = await response.json();
            return data.response || 'Error processing response.';
        } catch (error) {
            console.error('Fetch Error:', error);
            throw error; // Re-throw to handle in sendMessage
        }
    }

    // Allow sending with Enter key, but only if not disabled
    document.getElementById('user-input').addEventListener('keypress', function(e) {
        if (e.key === 'Enter' && !document.getElementById('send-btn').disabled) {
            sendMessage();
        }
    });
</script>
