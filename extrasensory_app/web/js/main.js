var Main = {
    data() {
        return {
                isGuessed: false,
                guessedNumber: 0,
                extrasences: [],
                error: '',
                showError: false
            }
    },
    
    methods: {
        getGuess() {          
            this.isGuessed = true;
            exctrasences = this.performGuessAction();
        },   
        getAcuracy() {
            if (this.guessedNumber > 99 || this.guessedNumber < 0) {
                this.showErrorMessage('Число должно быть двузначным');
            } else {
                this.isGuessed = false;
                exctrasences = this.performGetAcuracy();
            }
        },
        performGuessAction() {
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
            })
            .catch((error) => {
                this.showErrorMessage(error); 
            });
        },
        performGetAcuracy() {
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
            }, 5000);
        }
    }
            
}

Vue.createApp(Main).mount('#main');