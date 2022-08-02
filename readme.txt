Migrations
php artisan make:migration CreatePersons
php artisan make:migration CreateAddress
php artisan migrate

Model
php artisan make:model Person
php artisan make:model Address

Controllers
php artisan make:controller PersonController
php artisan make:controller AddressController

Address Model Edit
    public function connectPerson()
    {
        return $this->hasOne('App\Models\Person','id','person_id');
    }

