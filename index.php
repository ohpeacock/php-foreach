<?php
date_default_timezone_set('UTC'); //setting the timezone so date error doesn't appear
$lines = file('data.txt'); // read the data.txt file into a variable called lines
$JanDate = strtotime('01-01-1998'); // convert the string '01-01-1998' to time format and assign it to the variable JanDate
    foreach ($lines as $line) // for each line in the variable lines... begin looping through every element
    {
        $line = trim($line); // trim the white space from each line as it is read
        $fields = explode(",",$line); // create a variable called fields and remove the comma delimiter via explode
        $lastname = $fields[1]; // create lastname variable to hold contents of $fields[1]
        $startdate = $fields[2]; // create startdate variable to hold contents of $fields[2]
        $salary = $fields[4]; // create salary variable to hold contents of $fields[4]
        $rating = trim($fields[5]); // create rating variable to hold contents of $fields[5]
        $list [$lastname] = array($startdate, $rating, $salary); // create an array list with a key of lastnamw with the values of startdate, rating, and salary
    }
    ksort($list); // sort the array list alphabetically by key
        foreach ($list as $lastname =>$values) // for each list value with the key of lastname, loop through and create an array called values
        {
            if (($values[2] > 60000) && (trim($values[1]) == 'good' || trim($values[1]) =='excellent') && (strtotime($values[0]) >= $JanDate)) //if salary > 6000 & rating is good or excellent & startdate > JanDate...
            {
                    echo $lastname ."\t " .date("F j, Y",strtotime($values[0]));   /*display the field for last name, a tab, and the field for start date (which is converted from` a string to time and then formatted as a long date*/
                    echo "\n";// place a new line before echoing more text
            }
        }
?>
