<html>

<head>
    <title>web scraping</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/main.css">
</head>

<body>
    <div class="container">
        <h5>This web site is web scraper </h5>
        <form action="App/action.php" method="POST">
            <h6>Please enter choose which site you wish to scrape</h6>
            <div class="form-group">
                <input class="form-check-input" type="radio" name="url" value="https://www.homegate.ch/mieten/immobilien/kanton-zuerich/trefferliste?ep=" checked required>
                <label class="form-check-label"> HomeGate </label>
            </div>
            <div class="form-group">
                <input class="form-check-input" type="radio" name="url" value="https://www.newhome.ch/de/kaufen/suchen/haus_wohnung/kanton_zuerich/liste.aspx?p=" required>
                <label class="form-check-label"> NewHome </label>
            </div>
            <input class="form-control btn btn-primary" type="submit" value="scrape" name="submit">
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</html>
