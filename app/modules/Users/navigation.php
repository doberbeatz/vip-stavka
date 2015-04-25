<?php

Navigation::getSection('Sidebar')->addItem('USERS', array(\Backend::getPathPrefix() . '.users.index', array()), array
('label'=>'Пользователи', 'icon'=>'users', 'order'=>3));