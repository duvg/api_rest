# Api Rest with Symfony

This is a project to manage users

1. Authentication
2. User creation and list

## Usage Instructions

This repository contains 

If you are unfamiliar with Git and GitHub, please read the instructions on usage below carefully and follow the steps.

### 1. Clone the repository

Login to [GitHub](https://github.com) and navigate to [this repository](https://github.com/duvg/api_rest)

```http
https://github.com/duvg/api_rest
```

```bash
git clone https://github.com/duvg/api_rest.git
```

### 2. Navigate to the project

From the terminal, run the below command to navigate to a particular branch, replace "<branch-name>" with the name of the branch (typically provided in the exercise)

```bash
git checkout <branch-name>
```

The "branch-name" should match exactly to the branch specified in the exercises.

You should also set the upstream (online) branch by running

```bash
git push --set-upstream origin <branch-name>
```

### 3. Track the changes and push it to your repository on GitHub

This involves 4 steps.

**Step 1**: Check the changes you have made by running

```bash
git status
```

This will highlight the files that been added, deleted or changed.

**Step 2**: Add the changes to the working tree

```bash
git add <file-name>
```

`git status` will provide you will list of files, you will need to do this with each file that has been added or changed.

**Step 3**: Record and commit the changes

```bash
git commit -m "<What changes have you done?>"
```

**Step 4**: Push your changes to GitHub (origin)

```bash
git push
```

This requires the `git push --set-upstream origin <branch-name>` completed as specified in section 2 above

## Running the project

This project is configurated to use Docker, you need create the basis env files, copy .dist fiels and remove this last extension

**Requirements for install, build and run**:

Docker <br>
composer <br>
postman
MySql


Install Make:<br>
Linux: <br>
$ sudo apt install make <br>
$ sudo apt install build-essential <br>

MacOS: <br>
$ xcode-select --install

Whe you have make installed in your machine you can run commands defined in make file of project to build, run and stop project, feel free to test it

When type make command in terminal this show the list of available commands in project 

**Run**: <br>
make build: this command is for download images, create containers and networks, this create a empty database <br>
make run: this command is for run the containers
ssh-be: this command is to enter the container and execute symfony console commands

When you're inside container be run composer install for install all dependencies of project

For connect to mysql from client use this credentials (defined in docker compose file) <br><br>

#### Normal User <br>
server: localhost <br>
post: 3600 <br>
user: users <br>
password: password <br>

#### Root User <br>
server: localhost <br>
post: 3600 <br>
user: root <br>
password: root <br>

### Data configuration and test endpoint

Take SQL script from folder extra and run for create database basic data <br>
Import postman endpoints from folder extra

