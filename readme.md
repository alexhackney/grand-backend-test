# Grand Backend Test
**`Submitted by Alex Hackney`**

Install Instructions

 1. Clone Repo
 2. Composer Install
 3. Create /database/database.sqlite
 4. Run php artisan migrate
 5. Review
 6. Hire Me

**Active Endpoints**

	Tasks
    GET 	| api/task              | View All Tasks
    POST	| api/task              | Create New Task
    GET     | api/task/{task id}    | Get Task By ID
    PUT     | api/task/{task id}    | Update Task
    DELETE	| api/task/{task}       | Delete Task
    
    Weather
    POST	| api/weather           | Get Weather By Zipcode

**For Weather End Point**

If invalid zipcode is given, app will respond with a `418 (I'm a teapot)` error.
