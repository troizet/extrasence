var Main = {
    data() {
        return {
                isGuessed: false,
                guessedNumber: 0,
                extrasences: []
            }
    },
    
    methods: {
        getGuess() {
            this.isGuessed = true;
            exctrasences = this.performGuessAction();
        },
        
        getAcuracy() {
            this.isGuessed = false;
            exctrasences = this.performGetAcuracy();
        },
        performGuessAction() {
            fetch('/api/guess')
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                console.log(data);
                this.extrasences = data;
            });
        },
        performGetAcuracy() {
            fetch('/api/acuracy?number=' + this.guessedNumber)
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                console.log(data);
                this.extrasences = data;
            });   
        }
        
        
    }
            
}

Vue.createApp(Main).mount('#main');