<html lang="en">

    <head>
        <link href="FrontPage.css" rel="stylesheet" type="text/css">
        <title>Main Page</title>
        <meta name="description" content="Personal site">
        <meta name="keywords" content="FrontPage">
        <meta name="author" content="Nathan, Nick, Michiel">
        <script>

            String.prototype.replaceAt = function (index, replacement)
            {
                return this.substr(0, index) + replacement + this.substr(index + replacement.length);
            }

            function TitleAnimation()
            {

                var FinalText = document.getElementById("PageTitle").innerText;
                var StartText = "";
                for (var i = 0; i < FinalText.length; i++)
                    StartText += "0";

                document.getElementById("PageTitle").innerText = StartText;

                var currentText = StartText;
                setInterval(function ()
                {
                    var index = Math.floor(Math.random() * FinalText.length);


                    if (Math.floor(Math.random() * 10) > 1 && FinalText.charAt(index) != currentText.charAt(index))
                    {
                        var randomChar = Math.random().toString(36).substring(7);
                        randomChar = randomChar.charAt(0) + "";
                        currentText = currentText.replaceAt(index, randomChar)
                    }

                    else
                    {
                        var char = FinalText.charAt(index) + "";
                        currentText = currentText.replaceAt(index, char);
                    }

                    document.getElementById("PageTitle").innerText = currentText;

                }, 5);
            }

            function clickCard(pageLink)
            {
                window.location.href = "https://" + pageLink;
            }

        </script>
    </head>
    <body onload="TitleAnimation()">


        <div class="CenterDiv">
            <div style="width: 100%">
                <h1 id="PageTitle">CHOOSE YOUR PAGE</h1>
                <ul id="HostNames">
                    <li onclick="clickCard('michiel.legters.org/index.php')">
                        <div class="TextCenterDiv"><span>Michiel</span></div>
                    </li>
                    <li onclick="clickCard('nathan.legters.org/index.php')">
                        <div class="TextCenterDiv"><span>Nathan</span></div>
                    </li>
                    <li onclick="clickCard('nick.legters.org/index.php')">
                        <div class="TextCenterDiv"><span>Nicc</span></div>
                    </li>
                </ul>
            </div>
        </div>

    </body>
</html>