<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item">
    <a class="nav-link" href="{{ backpack_url('dashboard') }}">
        <i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}
    </a>
</li>
<li class="nav-title">Основное</li>
<li class='nav-item'>
    <a class='nav-link' href='{{ backpack_url('role') }}'>
        <i class="nav-icon las la-user-tag"></i> Роли
    </a>
</li>
<li class='nav-item'>
    <a class='nav-link' href='{{ backpack_url('user') }}'>
        <i class='nav-icon la la-users'></i> Пользователи
    </a>
</li>
<li class='nav-item'>
    <a class='nav-link' href='{{ backpack_url('organization') }}'>
        <i class="nav-icon las la-copyright"></i> Организации
    </a>
</li>
<li class='nav-item'>
    <a class='nav-link' href='{{ backpack_url('staff') }}'>
        <i class="nav-icon las la-briefcase"></i> Сотрудники
    </a>
</li>
<li class="nav-title">Налоги</li>
<li class='nav-item'>
    <a class='nav-link' href='{{ backpack_url('tax') }}'>
        <i class="nav-icon las la-coins"></i> Налоги
    </a>
</li>
<li class="nav-title">Контакты</li>
<li class='nav-item'>
    <a class='nav-link' href='{{ backpack_url('faq') }}'>
        <i class="nav-icon las la-question-circle"></i> Чаво
    </a>
</li>
<li class='nav-item'>
    <a class='nav-link' href='{{ backpack_url('news') }}'>
        <i class="nav-icon las la-newspaper"></i> Новости
    </a>
</li>

