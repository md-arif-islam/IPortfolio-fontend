let name;

(function ($) {
  $(document).ready(function () {
    $("#chat-msg").height($("body").height() - $("#chat-msg").offset().top);
    $("#chat-text").height($("#chat-text").parent().height() - 8);
    name = prompt("What is Your name");
    $("#chat-text").focus();
  });

  $("#button").on("click", function (e) {
    let msg = $("#chat-text").val();
    $("#chat-text").val("");
    //   $("<p/>").html(msg).appendTo($("#chat-body"));
    //   $("#chat-body").scrollTop($("#chat-body").prop("scrollHeight"));
    //   return false;

    $.post("data.php", { message: msg, sender: name }, function (data) {
      $("#chat-body").html(data);
      $("#chat-body").scrollTop($("#chat-body").prop("scrollHeight"));
    });

    return false;
  });

  setInterval(function () {
    $.post("data.php", { refresh: 1 }, function (data) {
      $("#chat-body").html(data);
      $("#chat-body").scrollTop($("#chat-body").prop("scrollHeight"));
    });
  }, 500);
})(jQuery);
