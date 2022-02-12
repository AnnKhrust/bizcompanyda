function send(event, php){

    console.log("Отправка запроса");

    event.preventDefault ? event.preventDefault() : event.returnValue = false;

    var req = new XMLHttpRequest();

    req.open('POST', php, true);

    req.onload = function() {

        if (req.status >= 200 && req.status < 400) {

        json = JSON.parse(this.response); 

            console.log(json);

            if (json.result == "success") {

                document.location.href = "/thx"

            } else {

                alert("Ошибка. Сообщение не отправлено");

            }

        } else {alert("Ошибка сервера. Номер: "+req.status);}}; 

    req.onerror = function() {alert("Ошибка отправки запроса");};

    req.send(new FormData(event.target));

    }