<template>
    <div class="web-manager">

        <c-header :pTgStatus="adminMode"></c-header>

        <nav-pub-edit :pAdminMode="adminMode"></nav-pub-edit>

        <c-bell @eBellStatus="adminMode = $event"></c-bell>

    </div>
</template>

<script>
    import Header from './components/header'
    import Bell from './components/bell'
    import NavPubEdit from './navigation/publication/edit'
    export default {
        components: {
            'c-header': Header,
            'c-bell': Bell,
            'nav-pub-edit': NavPubEdit,
        },
        data(){
            return{
                adminMode: true
            }
        },
        methods:{
            tgAdminMode(){
                this.adminMode = !this.adminMode;
                let wrapper = document.getElementsByClassName("main-wrapper")[0]
                this.adminMode ? wrapper.classList.add("wr-comply") : wrapper.classList.remove("wr-comply");
            }
        }
    }
</script>
