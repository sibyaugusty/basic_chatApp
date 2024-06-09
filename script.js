$(document).ready(function () {
    // Function to fetch and display chat messages
    function fetchMessages() {
        $.ajax({
            url: "chat.php",
            method: "GET",
            success: function (data) {
                $("#chat-messages").html(data);
                // Scroll to the bottom to show the latest messages
                $("#chat-messages").scrollTop($("#chat-messages")[0].scrollHeight);
            },
        });
    }

    // Initial fetch
    fetchMessages();

    // Send message functionality
    $("#send-button").click(function () {
        var message = $("#message-input").val();
        if (message.trim() !== "") {
            $.ajax({
                url: "chat.php",
                method: "POST",
                data: { message: message },
                success: function (response) {
                    // Clear the input field
                    $("#message-input").val("");
                    // Update the chat messages
                    fetchMessages();
                },
            });
        }
    });

    // Periodically fetch new messages (adjust the interval as needed)
    setInterval(fetchMessages, 1000);
});
