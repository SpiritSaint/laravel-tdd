Vue.component('user-management', {
    props: ['auth', 'user'],

    /**
     * Data
     */
    data: function () {
        return {
            name: '',
            password: '',
            password_confirmation: '',
        }
    },
    /**
     * Created
     */
    created() {
        this.name = this.user.name;
    },

    /**
     * Methods
     */
    methods: {
        updateDetails() {
            let self = this;

            swal({
                title: "Are you sure?",
                text: "This user will be updated.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willPromote) => {
                if (willPromote) {
                    self.user_updating = true;

                    axios.put('/users/' + this.user.id, {
                        name: self.name,
                        password: self.password,
                        password_confirmation: self.password_confirmation
                    }).then((response) => {
                        self.name = response.data.name;
                        self.user_updating = false;

                        swal("Yeah! The user has been updated!", {
                            icon: "success",
                        });
                    });
                }
            });
        }
    },
});
