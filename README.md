Dogan Hasko
Backend Web Werktraject Erasmus Hogeschool

Git Link= https://github.com/doganhasko/BackendWeb

To Start the Project=
1) npm install
2) composer install
3) Start XAMPP MySQL
4) npm run dev
5) php artisan serve

project is running on= http://127.0.0.1:8000/

PROJECT EXPLANATION
ABOUT PROJECT

The Backend of this assignment is prepared by mostly using the class material of Kevin Felix. I used MySQL in this project.
Some frontend layouts used from https://startbootstrap.com/ . I have created admins with is_admin variable in the users table. But I also used separately an admin panel and configured it like i wanted= https://open-admin.org/docs. OpenAdmin has apart table for it's admins. So I have 2 different table for OpenAdmin and Users(including is_admin variable). To go to OpenAdmin's Login panel; there is a button in User Login page. OpenAdmin login page did not offer chance to edit it and integrate with my User Login page, this is why I built it like this. When i finally tried to add Seed an Admin in OpenAdmin, it didn't work with seeding. So I will not be able to show OpenAdmin, but ofcourse Admins in my Users are still available. 
Also when I got stuck ofcourse I asked help of ChatGpt and Claude. But they were not that helpful.
Obviously I didn't just use the bootstrap, I modified them as I wished.
Sources=
https://startbootstrap.com/
https://open-admin.org/
EHB BackendWeb Courses