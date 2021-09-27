<?php

$route = new \CoffeeCode\Router\Router(ROOT);
session_start();

/**
 * APP
 */
$route->namespace("App\Controllers");

/**
 * Admin
 */
$route->group(null);

/**OrdersController
$route->get("/orders", "Admin\OrdersController:index");
$route->get("/order/{id}", "Admin\OrdersController:order");
$route->post("/order/invoice", "Admin\OrdersController:invoiceOrder");
$route->post("/order/cancel", "Admin\OrdersController:cancelOrder");**/

$route->get("/", "LoginControllerController:index");
$route->post("/login", "LoginControllerController:login");
$route->get("/logout", "LoginControllerController:logout");

$route->get("/home", "HomeController:index");

$route->get("/categories", "CategoriesController:index");
$route->get("/categories/create", "CategoriesController:create");
$route->post("/categories/save", "CategoriesController:save");
$route->get("/categories/{id}/edit", "CategoriesController:edit");
$route->post("/categories/update/{id}", "CategoriesController:update");

$route->get("/sub-categories", "SubCategoriesController:index");
$route->get("/sub-categories/create", "SubCategoriesController:create");
$route->post("/sub-categories/save", "SubCategoriesController:save");
$route->get("/sub-categories/{id}/edit", "SubCategoriesController:edit");
$route->post("/sub-categories/update/{id}", "SubCategoriesController:update");
$route->get("/sub-categories/{id}/delete", "SubCategoriesController:delete");

$route->get("/glossary", "GlossaryController:index");
$route->get("/glossary/create", "GlossaryController:create");
$route->post("/glossary/save", "GlossaryController:save");
$route->get("/glossary/{id}/edit", "GlossaryController:edit");
$route->post("/glossary/update/{id}", "GlossaryController:update");
$route->get("/glossary/{id}/delete", "GlossaryController:delete");

$route->get("/formula", "FormulaController:index");
$route->get("/formula/create", "FormulaController:create");
$route->post("/formula/save", "FormulaController:save");
$route->get("/formula/{id}/edit", "FormulaController:edit");
$route->post("/formula/update/{id}", "FormulaController:update");
$route->get("/formula/{id}/delete", "FormulaController:delete");

$route->get("/vehicles", "VehiclesController:index");
$route->get("/vehicles/create", "VehiclesController:create");
$route->post("/vehicles/save", "VehiclesController:save");
$route->get("/vehicles/{id}/edit", "VehiclesController:edit");
$route->post("/vehicles/update/{id}", "VehiclesController:update");
$route->get("/vehicles/{id}/delete", "VehiclesController:delete");

$route->get("/institutional", "InstitutionalController:index");
$route->get("/institutional/{id}/edit", "InstitutionalController:edit");
$route->post("/institutional/update/{id}", "InstitutionalController:update");

$route->get("/partners", "PartnersController:index");
$route->get("/partners/create", "PartnersController:create");
$route->post("/partners/save", "PartnersController:save");
$route->get("/partners/{id}/edit", "PartnersController:edit");
$route->post("/partners/update/{id}", "PartnersController:update");
$route->get("/partners/{id}/delete", "PartnersController:delete");

$route->get("/impression-history", "ImpressionHistoryController:index");
$route->get("/impression-history/{id}/edit", "ImpressionHistoryController:edit");
$route->post("/impression-history/update/{id}", "ImpressionHistoryController:update");

$route->get("/users", "UsersController:index");
$route->get("/users/create", "UsersController:create");
$route->post("/users/save", "UsersController:save");
$route->get("/users/{id}/edit", "UsersController:edit");
$route->post("/users/update/{id}", "UsersController:update");
$route->get("/users/{id}/delete", "UsersController:delete");

$route->get("/doctors", "DoctorsController:index");
$route->get("/doctors/create", "DoctorsController:create");
$route->post("/doctors/save", "DoctorsController:save");
$route->get("/doctors/{id}/edit", "DoctorsController:edit");
$route->post("/doctors/update/{id}", "DoctorsController:update");
$route->get("/doctors/{id}/delete", "DoctorsController:delete");
$route->get("/doctors/export", "DoctorsController:generateCSV");


$route->get("/doctors-segment", "DoctorsSegmentController:selectSegment");
$route->get("/doctors-segment/selected", "DoctorsSegmentController:index");
$route->get("/doctors-segment/export/{segment}", "DoctorsSegmentController:generateCSV");

/**
 * ERROR
 */
$route->group("ops");
$route->get("/{errcode}", "WebController:error");

/**
 * PROCESS
 */
$route->dispatch();

if ($route->error()) {
    $route->redirect("/ops/{$route->error()}");
}