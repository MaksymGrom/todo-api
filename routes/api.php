<?php

Route::resource('todos', 'TodoController')->except(['edit', 'create']);
