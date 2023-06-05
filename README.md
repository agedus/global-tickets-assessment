# About my assessment

## How to run the application
Here you wil read on how to run the app.

also the app is build in PHP 8.2 and Laravel version 10.

### Building the database


Please first go to the folder of the app and set in the env file your data for the database and then run:
```bash
php artisan migrate
```

### Build the css to be sure
This should not be needed but cant hurt to do to be sure. Please also run:
```bash
npm run build
```

### Serving your app
If you use valet you can go to the program folder and run :
```bash
valet link
```
Or if you have a folder and have run valet park just put it in there. The link should be:
```url
http://global-tickets-assessment.test
```

If you do not have valet or are on windows you can use:
```bash
php artisan serve
```
in the root of the app.

## How to use the app
When you start your app you will be able to to login or register from the homescreen. Please first register as a user. This wil show you the url overview screen after you logged in or registered. This page should first be empty because you do not have any urls. On the right top you can press add new url. This wil show you a page where you can enter a link to what ever page you want. There is validation on the input so that you can only input a url. After you press save the app wil gen a hash for you and wil return you to the overview. This wil now have one row in the table to show your just created short url. From here you can delete open or edit your shortened urls.

## Notes from the code
Here are some notes and explanations from my code:

1. When creating a hash for the shortened url the app gets a hash of 8 long. It wil then look if there are any hashes that are like the same and adds a count of the amount after the hash so that you never can get the same hash. It wil be really hard of course to get the same hash but just to be sure we have build this. 
2. I also made a urlRequest so that when updating and saving a url it wil validate the url outside of the controller(code wise). This has the Laravel made url validation.
