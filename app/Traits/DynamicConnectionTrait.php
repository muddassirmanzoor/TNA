<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait DynamicConnectionTrait
{
    /**
     * Set the database connection dynamically based on the endpoint.
     *
     * @param string $connectionName
     * @return void
     */
    public function setDynamicConnection($connectionName)
    {
        $this->setConnection($connectionName);
    }

    /**
     * Determine the connection name based on the endpoint.
     *
     * @return string
     */
    public function determineConnection()
    {
        // Get the current route
        $route = request()->path(); // You can also use request()->route()->getName() if you prefer named routes.

        // Choose the correct database connection based on the endpoint
        return str_contains($route, 'production') ? 'mysql2' : 'mysql';
    }

    /**
     * Boot the model and set the dynamic connection.
     *
     * @return void
     */
    public static function bootDynamicConnectionTrait()
    {
        static::creating(function (Model $model) {
            $model->setDynamicConnection($model->determineConnection());
        });
    }
    /**
     * Get the current database connection name.
     *
     * @return string
     */
    public function getCurrentConnectionName()
    {
        return $this->getConnectionName(); // This method retrieves the current connection name
    }
}
