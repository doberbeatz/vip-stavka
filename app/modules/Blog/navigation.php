<?php

Navigation::getSection('Sidebar')->addItem('BLOG', array(\Backend::getPathPrefix() . '.blog.index', array()), array('label'=>'Блог', 'icon'=>'book', 'order'=>3));