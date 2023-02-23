## About Garmin R10 analyzer
Garmin R10 analyzer will analyze your Garmin's data export and export them to into Excel file for further analyzes. 

Analyzer has multiple options in order to help you export data. I was motivated to create this analyzer, because other tools just export data in CSV data and a lot of work have to be done in excel.

Analyzer will mark wrong shots (all clubs has it's own settings), so bad shots are simplier avoid in contingency tables. See sample_sheet.xlsx with already prepared contingency contingency tables. 

### Options
All speed variables are atomatically convert from ms to mph
Distance variables are kept in meters

config.ini files contains multiple options:

**analyze_golf_shots** - IF it's true, analyzer will parse all golf sim shots and will mark bad shots based on other settings for every club.

**driver_min_carry**
Value is in meters (like other values)
If recorded value is lower, shot is marked as bad. 

**driver_max_deviation_distance**
if total deviation distance is higher, shot is marked as bad shot. This option will help you configure deviation range for good golf shots

Other clubs have the similar options, so you can configure option for every single of them

## How to run
This script was developed and tested on PHP8.2 You can download PHP for your operatin system here: 
https://www.php.net/downloads.php

You need get data from Garmin. Usually it took a few hours to export all the data (depends on data complexity). 


Go to your Garmin Data Management Account. - https://www.garmin.com/account/datamanagement/

Sign in.

Select Export Your Data.

Select Request Data Export.

Unzip data and place all folders into **garmin_data** folder
if you want different path than default, path to data is configurable in the config.ini file

run command:
php analyze.php

You will find exported file in the **exports** folder

## Troubleshooting
**php analyze cause some PHP error**
Try to look to vendor folder. There must be all dependendies. You can try to download composer https://getcomposer.org and try to download all dependenies again by running:

composer install
composer dump-autoload -o

You can also try to run tests:
composer run tests


## License
The code is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
