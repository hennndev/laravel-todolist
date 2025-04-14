<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodosController;
use Illuminate\Support\Facades\Route;

Route::get("/", function() {
    return redirect()->route("todos.index");
});


Route::middleware(["auth", "verified"])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::prefix("todos")->controller(TodosController::class)->group(function() {
        Route::get("/", "index")->name("todos.index");
        Route::get("/add-todo", "add")->name("todos.add");
        Route::get("/edit-todo/{id}", "edit")->name("todos.edit");
        Route::get("/{id}", "detail")->name("todos.detail");
    
        Route::post("/", "store")->name("todos.store");
        Route::put("/{id}", "update")->name("todos.update");
        Route::patch("/{id}/done", "done")->name("todos.done");
        Route::patch("/{id}/undone", "undone")->name("todos.undone");
        Route::delete("/{id}", "destroy")->name("todos.destroy");
    });
});

require __DIR__.'/auth.php';
