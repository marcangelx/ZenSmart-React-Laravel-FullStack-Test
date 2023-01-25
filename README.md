<a name="readme-top"></a>

<div align="center">
    <h3 align="center">ZenSmart-React-Laravel-FullStack-Test</h3>
</div>
Creating the project in WSL2 is highly recommended for better performance.

## How to Setup Laravel Project

### Prerequisites:

-   Docker Desktop
-   WSL2
-   Composer
-   Git Bash
-   Npm

### Steps:

-   Clone the repository in `git clone https://github.com/marcangelx/ZenSmart-React-Laravel-FullStack-Test.git`
-   After Cloning run "composer install".
-   Duplicate `.env.example` and name it as `.env`.
-   (Optional) Create a Bash alias `alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'` (Kindly execute this on command line)
-   Run laravel sail `./vendor/bin/sail up -d` or `sail up -d` Note: Make sure the Docker Desktop is running.
-   Run `sail artisan migrate:fresh --seed` to generate table and data

## API Documentation

| API          | Type   | Response | Description          |
| ------------ | ------ | -------- | -------------------- |
| `/api/tally` | `POST` | `Json`   | Increase click count |
| `/api/tally` | `GET`  | `Json`   | Retrieve click count |

```json
{
    "data": {
        "id": "5",
        "attributes": {
            "clicks": 8,
            "date": "2023-01-25",
            "history": [
                {
                    "count": 8,
                    "tally_id": 5,
                    "created_at": "2023-01-25T12:08:56.000000Z"
                },
                {
                    "count": 7,
                    "tally_id": 5,
                    "created_at": "2023-01-25T12:08:32.000000Z"
                },
                {
                    "count": 6,
                    "tally_id": 5,
                    "created_at": "2023-01-25T12:06:51.000000Z"
                }
            ]
        }
    }
}
```

## Run PHPunit Test

-   `sail artisan test` or `./vendor/bin/sail artisan test`

## Notes

-   ## If you encountered a storage permission error. Kindly follow these steps.
-   Go to root-shell by running this command `sail root-shell`
-   Then go outside of the current directory `cd ..`
-   Change the owner of the folder `chown -R sail:sail html`
-   Kindly double check by checking the file `ls -la`
-   REF:https://github.com/laravel/sail/issues/81
-   ## If you encountered a SQLSTATE[08006] [7] connection to server at "pgsql". Kindly follow theses steps.
-   Remove all current volume and images `./vendor/bin/sail down --rmi all -v` or `sail down --rmi all -v`
-   If that does not work, Please change the port at docker-compose.yml and .env file
-   REF:https://laracasts.com/discuss/channels/servers/laravel-sail-no-dbdb-user-created

## How to Setup React Project

-   Go to the react directory `cd react`
-   Run `npm install` & `npm run dev`

    ![Alt text](click-me.png?raw=true "Title")
