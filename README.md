## About the Garmin R10 analyzer
Garmin R10 analyzer will analyze your Garmin's data export and export them into an Excel file for further analysis.

Analyzer has multiple options to help you export data. I was motivated to create this analyzer because other tools just export data in CSV data and a lot of work have to be done in excel.

Analyzer will mark wrong shots (all clubs have their settings), so bad shots are simpler to avoid in contingency tables. See sample_sheet.xlsx with already prepared contingency tables.

### Options
All speed variables are automatically converted from ms to mph
Distance variables are kept in meters

config.ini files contain multiple options:

**analyze_golf_shots** - IF it's true, the analyzer will parse all golf sim shots and will mark bad shots based on other settings for every club.

**driver_min_carry** Value is in meters (like other values) If a recorded value is lower, a shot is marked as bad.
**driver_max_deviation_distance** if the total deviation distance is higher, a shot is marked as a bad shot. This option will help you configure the deviation range for good golf shots

Other clubs have similar options, so you can configure options for every single of them

## How to run
This script was developed and tested on PHP8.2 You can download PHP for your operating system here:https://www.php.net/downloads.php
You need to get data from Garmin. Usually, it took a few hours to export all the data (depending on data complexity).

Go to your Garmin Data Management Account. - https://www.garmin.com/account/datamanagement/

Sign in.

Select Export Your Data.

Select Request Data Export.

Unzip data and place all folders into garmin_data folder if you want a different path than the default, path to data is configurable in the config.ini file

run command: php analyze.php

You will find an exported file in the exports folder

## Troubleshooting
php analyze cause some PHP errors Try to look to the vendor folder. There must be all dependencies. You can try to download composer https://getcomposer.org and try to download all dependencies again by running:
composer install composer dump-autoload -o
You can also try to run tests: composer run tests

### folders missing
create folders "garmin_data" and "exports"

### Windows Troubleshooting
Windows is not natural environment for php. It works with some tweak, though.
1. download php into folder: C:\php
2. in php folder rename php.ini-development to php.ini
3. open php.ini file and find line: extension=mbstring
4. be sure it allowed (remove ; char at the line beginning)
5. add php folder into your PATH ;https://www.forevolve.com/en/articles/2016/10/27/how-to-add-your-php-runtime-directory-to-your-windows-10-path-environment-variable/
6. You should be able to run php analyze.php in folder with the application

## License
The code is open-sourced software licensed under the MIT license.
