<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script defer>
        $(document).ready(function () {
            $(".action").on('click', function (e) {
                const operand1 = $("#arg1").val();
                const operand2 = $("#arg2").val();
                const action = e.target.value;

                $.ajax({
                    url: "calc.php",
                    type: "POST",
                    dataType: "json",
                    data: {
                        arg1: operand1,
                        arg2: operand2,
                        operation: action
                    },
                    error: function () {
                        alert("Что-то пошло не так...");
                    },
                    success: function (answer) {
                        $('#result').val(answer.result);
                    }
                });
            });
        });
    </script>
    <style>
        .margin {
            margin: 4px;
        }

        .container {
            display: flex;
            align-items: center;
        }

        .operations {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }
    </style>
</head>
<body>
<div class="container">
    <input class="margin" type="text" id="arg1" value="" placeholder="Argument">
    <input class="margin" type="text" id="arg2" value="" placeholder="Argument">
    <div class="operations margin">
        <button class='action' value="sum"> +</button>
        <button class='action' value="sub"> -</button>
        <button class='action' value="mul"> *</button>
        <button class='action' value="div"> /</button>
    </div>
    <input class="margin" type="text" id="result" value="" placeholder="Result">
</div>
</body>
</html>