# CRM
This project was developed on top of Filament


### Installation Instruction
- Clone the repository `` git clone https://github.com/devfaysal/crm.git your_project_name``
- Enter the project folder `` cd your_project_name ``
- Install composer packages `` composer install ``
- Copy .env.example to .env `` cp .env.example .env ``
- Generate encryption key `` php artisan key:generate ``
- Update the .env file with database credentials
- Run migration `` php artisan migrate ``
- Seed the database `` php artisan db:seed ``
- Run the server `` php artisan serve ``
- Visit [localhost:8000/admin](http://localhost:8000/admin) `` email: devfaysal@gmail.com Password: password ``
