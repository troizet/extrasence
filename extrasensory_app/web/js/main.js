var Main = {
    data() {
        return {
                isGuessed: false,
                guessedNumber: 0,
                extrasences: [],
                error: '',
                showError: false,
                history: [],
                enabled: true
            }
    },
    mounted() {
        this.performHistoryAction();
    },
    methods: {
        getGuess() {          
            this.performGuessAction();
            //this.isGuessed = true;
        },   
        getAcuracy() {
            if (this.guessedNumber > 99 || this.guessedNumber < 10) {
                this.showErrorMessage('Число должно быть двузначным');
            } else {
                //this.isGuessed = false;
                this.performAcuracyAction();
            }
        },
        performGuessAction() {
            this.enabled = false;
            fetch('/api/guess')
            .then((response) => {
                if (!response.ok) {
                    throw Error(response.statusText);
                }
                return response.json();
            })
            .then((data) => {
                console.log(data);
                this.extrasences = data;
                this.isGuessed = true;
                this.enabled = true;
            })
            .catch((error) => {
                this.showErrorMessage(error); 
            });
        },
        performAcuracyAction() {
            this.enabled = false;
            fetch('/api/acuracy?number=' + this.guessedNumber)
            .then((response) => {
                if (!response.ok) {
                    throw Error(response.statusText);
                }
                return response.json();
            })
            .then((data) => {
                console.log(data);
                this.extrasences = data;
                this.performHistoryAction();
            })
            .catch((error) => {
                this.showErrorMessage(error);
            });        
        },
        performHistoryAction() {
            fetch('/api/history')
                    .then((response) => {
                        if (!response.ok) {
                            throw Error(response.statusText);
                        }
                        return response.json();
                    })
                    .then((data) => {
                        console.log(data);
                        this.history = data;
                        this.isGuessed = false;
                        this.enabled = true;
                    })
                    .catch((error) => {
                        this.showErrorMessage(error);
                    });
        },
        showErrorMessage(error) {
            this.error = error;
            this.showError = true;
            setTimeout(() => {
                    this.showError = false;
                    this.error = '';
            }, 2000);
        }
    }
            
}

Vue.createApp(Main).mount('#main');