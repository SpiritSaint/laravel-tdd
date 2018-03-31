Vue.component('admin-user-management', {
    props: ['auth', 'user'],

    /**
     * Data
     */
    data: function () {
        return {
            admin: false,
            admin_updating: false,
        }
    },
    /**
     * Created
     */
    created() {
        if(this.user.is_admin == true) {
            this.admin = true;
        }
    },

    /**
     * Methods
     */
    methods: {
        upgradeToAdmin() {
            let self = this;

            swal({
                title: "Are you sure?",
                text: "This user will be upgrade.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willPromote) => {
                if (willPromote) {
                    self.admin_updating = true;

                    axios.get('/api/admin/users/' + this.user.id +'/upgrade-to-admin').then((response) => {
                        self.admin = response.data.is_admin;
                        self.admin_updating = false;

                        swal("Great! The user has been upgraded!", {
                            icon: "success",
                        });
                    });
                }
            });
        },
        degradeToUser() {
            let self = this

            swal({
                title: "Are you sure?",
                text: "This user will be downgrade.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDegrade) => {
                if (willDegrade) {
                    self.admin_updating = true;

                    axios.get('/api/admin/users/' + this.user.id +'/downgrade-to-user').then((response) => {
                    
                        self.admin = response.data.is_admin;
                        self.admin_updating = false;

                        swal("Good! The user has been downgraded!", {
                            icon: "success",
                        });
                    });
                }
            });
        }
    },

    computed: {
        is_admin() {
            return this.admin;
        }
    }
});
