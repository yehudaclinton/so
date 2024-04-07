---
title: 'Set Profile'
template: form
pageconfig:
    parent: /singles
    include_username: true
    overwrite_mode: true
pagefrontmatter:
    template: item
    title: 'no name'
    taxonomy:
        category: blog
        tag:
            - profile
form:
    name: add_page.blogpost
    fields:
        -
            name: fname
            label: 'First name'
            type: text
        -
            name: lname
            label: 'Last name'
            type: text
        -
            name: location
            type: selectize
            selectize:
                options:
                    -
                        text: test
                        value: 'real value 1'
                    -
                        text: test-2
                        value: 'real value 2'
                    -
                        text: test-3
                        value: 'real value 3'
            size: large
            label: town
            validate:
                type: text
        -
            name: taxonomy.tag
            label: 'Tags (put boy or girl)'
            type: text
        -
            name: content
            label: 'About yourself'
            type: textarea
            size: long
            classes: editor
        -
            name: images
            label: 'Images to upload'
            type: file
            multiple: true
            accept:
                - 'image/*'
        -
            name: honeypot
            type: honeypot
    buttons:
        -
            type: submit
            value: Submit
    process:
        -
            add_page: true
        -
            redirect: /singles
access:
    site.login: true
---

here is where you set your profile