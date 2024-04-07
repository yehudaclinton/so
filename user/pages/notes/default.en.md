---
title: notes
access:
    admin.login: true
---

## front end notes
plugins/flex-objects/admin/templates/flex-objects/types/default/list/list_actions.html.twig
added

    {% block action_update_user_group %}
    <a href="#" title="Update User Group" class="update-user-group-action" data-object-id="{{ object.getKey() }}">
        <i class="fa fa-check-circle"></i>
    </a>
    {% endblock %}
    
    
## where we added the save button
plugins/flex-objects/admin/templates/flex-objects/types/default/titlebar/list.html.twig

## where we got the button from
plugins/flex-objects/admin/templates/flex-objects/types/default/titlebar/configure.html.twig

## where i add the frontend ajax js 
plugins/flex-objects/admin/templates/flex-objects/types/default/list.html.twig

{% if page.url() == '/admin/users' %}
  {% do assets.addJs('plugin://settlersonly/custom-admin-actions.js', {group: 'bottom', 'loading': 'defer' }) %}
{% endif %}

the if doesnt yet work

## to change user edit profile page
plugins/login/pages/profile.md

## where admin edit is
/system/blueprints/user/account.yaml

## user registration
user/plugins/login/pages/register.md
user/plugins/login/login.yaml (also change here for validation)

## add page by form set title to username
plugins/add-page-by-form/add-page-by-form.php

  $page_frontmatter['title'] = $this->grav['session']->user->username;
  $slug = $this->grav['session']->user->username;
  
also the send email button
