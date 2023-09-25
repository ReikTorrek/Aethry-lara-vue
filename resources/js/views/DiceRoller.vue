<template>
    <div>
        <div v-for="dice in dices" :key="dice.label" class="dice-container">
            <div class="dice-block" @click="rollDice(dice)">
                <p>{{ dice.label }}</p>
            </div>
            <div class="result">
                <p>{{ diceResults[dice.label] }}</p>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

axios.defaults.withCredentials = true
export default {
    name: "DiceRoller",
    data() {
        return {
            dices: [
                { label: '1d4', value: 4 },
                { label: '1d6', value: 6 },
                { label: '1d8', value: 8 },
                { label: '1d10', value: 10 },
                { label: '1d12', value: 12 },
                { label: '1d20', value: 20 },
                { label: '1d100', value: 100 },
            ],
            diceResults: {},
        };
    },
    methods: {
        rollDice(dice) {
            const result = Math.floor(Math.random() * dice.value) + 1;
            if (!this.diceResults[dice.label]) {
                this.diceResults[dice.label] = '';
            }
            if (this.diceResults[dice.label].length > 0) {
                this.diceResults[dice.label] += ', ';
            }
            this.diceResults[dice.label] += result;
        },
    },
}
</script>

<style scoped>
.dice-container {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.dice-block {
    width: 100px;
    height: 100px;
    background-color: lightblue;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    margin-right: 10px;
}

.result {
    margin-top: 20px;
}

.result p {
    font-size: 24px;
}
</style>
