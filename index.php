<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/styles.css">
    <title>QOL Tool</title>
</head>
<body>
    <form id="createheuristicform" class="w-50 pt-2 pb-5 container-fluid" action="./php/create_heuristic.php" method="get">
        <h2 class="pb-3">Create New Heuristic</h2>
        <div class="form-group">
            <label for="demo_key_select">Demographic Data:</label>
            <select name="demo_key_select">
                <option value="1">Population, 2017 estimate</option>
                <option value="2">Persons under 5 years, percent, 2016</option>
                <option value="3">Persons under 18 years, percent, 2016</option>
                <option value="4">Persons 65 years and over, percent, 2016</option>
                <option value="5">Number of Households</option>
                <option value="6">Median Household Income</option>
                <option value="7">Median Gross Rent</option>
                <option value="8">Median Value of Owner-Occupied Housing Units</option>
                <option value="9">Average Median Home Sales Price</option>
                <option value="10">Unemployment Rate</option>
                <option value="11">Cost Of Living Relative to National Average</option>
                <option value="12">Persons Living In Poverty</option>
                <option value="13">Job Growth, 2016</option>
                <option value="14">Gross Metro Product, 2017 Estimate</option>
                <option value="15">All Firms</option>
                <option value="16">Corporate HQ of Fortune 500 Companies</option>
                <option value="17">College Attainment</option>
                <option value="18">High School Graduate or Higher (25+ y/o)</option>
                <option value="19">Bachelor's Degree or Higher (25+ y/o)</option>
                <option value="20">Mean commute time</option>
                <option value="21">State Sales Tax</option>
                <option value="22">City Sales Tax</option>
                <option value="23">Combined Sales Tax</option>
                <option value="24">State Income Tax</option>
                <option value="25">Property Tax</option>
                <option value="26">Gas Tax</option>
                <option value="27">Violent Crimes per 100,000 people</option>
                <option value="28">Property Crimes per 100,000 people</option>
            </select><br>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" name="preference" value="1">Prefer Higher
            </label>
        </div>
        <div class="mb-3 form-check">
            <label class="form-check-label">
                <input type="radio" name="preference" value="-1">Prefer Lower
            </label>
        </div>
        <div class="form-group">
            <label for="weight_entry_select">Select Weighting:</label>
            <select name="weight_entry_select">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="5">5</option>
                <option value="8">8</option>
                <option value="13">13</option>
                <option value="21">21</option>
            </select>
        </div>
        <input type="submit" class="btn btn-outline-secondary" value="Submit">
        <button type="button" class="btn btn-outline-primary" id="calc_button">Calculate Heuristics</button>
    </form>
    <div class="container-fluid w-50 p-2" id="score_disp_cont"></div>
    <img class="w-25" src="https://preview.thenewsmarket.com/Previews/PWC/StillAssets/800x600/188517.JPG"/>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="calc_heur_script.js"></script>
</body>