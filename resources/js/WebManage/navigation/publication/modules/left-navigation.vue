<template>
    <div class="m-left-navigation">
        <c-toolbar
            :pType="'tool'"
            :pShow="pTgStatus"
            :pNavItems="filterToolNavigation"
            @eCurrentNav="currentTool = $event"/>

        <c-toolbar
            :pType="'window'"
            :pShow="pTgStatus && currentTool != null"
            :pNavItems="filterWinNavigation"
            @eCurrentNav="currentWin = $event"
            @eClose="currentTool = null"
        >
            <template #header-title >
                {{ currentTool ? currentTool.title : '' }}
            </template>
            <c-imager />







        </c-toolbar>
    </div>
</template>

<script>
import Toolbar from '../../../components/toolbar'
import Imager from '../../../components/imager'

export default {
    props: ['pTgStatus', 'pNavigation'],
    components: {
        'c-toolbar': Toolbar,
        'c-imager': Imager,
    },
    data(){
        return{
            currentTool: {
                title: 'Общие настройки',
                detail: 'Редактор публикационного профиля',
                alias: 'edit',
            },
            currentWin: null,
        }
    },
    computed: {
        filterToolNavigation() {
            let toolNav = [];
            this.pNavigation.forEach(
                navItem => {
                    if(navItem.navItems){
                        toolNav.push({
                            title: navItem.title,
                            detail: navItem.detail,
                            alias: navItem.alias,
                            isActive: this.currentTool ? navItem.alias === this.currentTool.alias : false
                        })
                    }
                })
            return toolNav;
        },
        filterWinNavigation() {
            let winNav = [];
            this.pNavigation.forEach(
                navItem => {
                    if(navItem.navItems){
                        winNav.push({
                            title: navItem.detail,
                            alias: navItem.alias,
                            isActive: this.currentWin ? navItem.alias === this.currentWin.alias : false
                        })
                    }
                })
            return winNav;
        },
    },
    methods: {



    }
}
</script>
