_# Project Setup_

Follow these steps to set up the project:

1. Run these commands initially:

    ```bash
    composer install
    php artisan migrate
    php artisan db:seed # for employees data entry
    npm run build
    npm run dev
    ```

   If you encounter any errors while running `composer`, enable the `ext-zip` PHP extension, which is needed for Excel import.

# API Endpoints

## Attendance Info

To get attendance info by ID, run this command with the employee ID:

 # bash
curl --location 'http://backendtask.test/api/v1/attendance/1?per_page=10'

# Excel Import
To import data from an Excel file, run this command in Postman:

curl --location 'http://backendtask.test/api/v1/attendance/upload' \
--form 'file=@"/C:/Users/dell/Desktop/Untitled spreadsheet.xlsx"'

###### Navigation
**Each challenge is linked by the top button in the navbar.**

##### Employee Excel sheet is placed on root directory**
