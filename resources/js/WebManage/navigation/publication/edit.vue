<template>
    <div class="nav-pub-edit">
        <m-left-navigation :pTgStatus="pAdminMode"
                           :pNavigation="leftNavigation" />


    </div>
</template>

<script>
    import LeftNavigation from './modules/left-navigation'
    export default {
        props: ['pAdminMode'],
        components: {
            'm-left-navigation': LeftNavigation
        },
        data(){
            return{
                leftNavigation: [
                    {
                        title: 'Общие настройки',
                        detail: 'Общие настройки данной страницы',
                        alias: 'edit',
                        navItems: [
                            {
                                alias: 'title',
                                title: 'Редактирование названия публикации',
                            },
                            {
                                alias: 'photo',
                                title: 'Редактирование главной фотографии публикации',
                            },
                            {
                                alias: 'managers',
                                title: 'Управление менеджерами и авторами публикации',
                            }
                        ]
                    },{
                        title: 'Lol',
                        alias: 'view-config',
                        detail: 'Настройка параметров выдачи публикации',
                        navItems: [
                            {
                                alias: 'title',
                                title: 'Редактирование названия публикации',
                            },
                            {
                                alias: 'photo',
                                title: 'Редактирование главной фотографии публикации',
                            },
                            {
                                alias: 'managers',
                                title: 'Управление менеджерами и авторами публикации',
                            }
                        ]
                    },
                    {alias: 'template-config', 'detail': 'Настройка параметров шаблона публикации'}
                ]
            }
        }
    }
</script>
