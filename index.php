<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <title>QOL Tool</title>
</head>
<body>
    <form id="createheuristicform" action="./php/create_heuristic.php" method="get">
        Demographic Data:
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
        <input type="radio" name="preference" value="1">Prefer Higher<br>
        <input type="radio" name="preference" value="-1">Prefer Lower<br>
        Select Weighting:
        <select name="weight_entry_select">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="5">5</option>
            <option value="8">8</option>
            <option value="13">13</option>
            <option value="21">21</option>
        </select>
        <input type="submit" value="Submit">
    </form>
</body>