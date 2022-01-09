# A simple blog post website

> This is the source code repository for blog.

## Installation

1. Fork this repository to your own account.
2. Clone the Forked repository `git clone https://github.com/your_github_username/blog.git`
3. After cloning, now run `cd blog` and get into your newly cloned local repository/folder.
4. Run `composer install` to install the dependencies as defined in the composer.json file.
5. Run `npm install` to install the dependencies as defined in the package.json file.
6. Now is the time to add the upstream remote address. This will be something useful in a team environment. Let’s say three person is working on a repository and everyone brings and pushes changes into what we call `upstream` or main repository. If you run `git remote -v` you will see that you have only `origin` configured and that’s looking to your fork. Now let’s add `upstream` as well:
   `git remote add upstream https://github.com/murtazasultani/blog.git`
7. you can create `.env` by `cp .env.example .env`
   then add your database credential in it.
8. Run `php artisan key:generate` to generate a key for your app.
9. Run `php artisan migrate --seed` to run the database migrations.
10. Run `npm run watch` or `npm run dev` to compile the assets.
11. Run `php artisan serve` to Serve the application on the PHP development server.

> You can now visit the app in your browser by visiting [http://127.0.0.1:8000](http://127.0.0.1:8000).

## Good Practices

1. Before doing fetching any records from upstream or pushing, always check if you are in the right branch. You can see what branch you are in by running the following command:
   `git branch`

2. Before doing any new work, always run `git fetch upstream` and then `git merge upstream/master` on the master branch. If you are not in the master branch, simply run `get checkout master` first to make sure you are in the master branch.

3. Keep every commit and its message meaningful and relevant.

4. Keep your PR titles meaningful and relevant.

5. Always include `ifix-` before your branch names. That’s our common pattern. `i` there is issue and fix is the fix you are providing.