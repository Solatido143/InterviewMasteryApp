<script setup>
import { Head, usePage } from "@inertiajs/vue3";
import { ref } from "vue";

const { props } = usePage();
const questions = props.questions;

const currentQuestionIndex = ref(0);
const selectedOption = ref("");
const score = ref(0);
const quizCompleted = ref(false);

const submitAnswer = () => {
    const currentQuestion = questions[currentQuestionIndex.value];
    if (selectedOption.value === currentQuestion.correct_option) {
        score.value++;
    }

    selectedOption.value = "";
    if (currentQuestionIndex.value < questions.length - 1) {
        currentQuestionIndex.value++;
    } else {
        quizCompleted.value = true;
    }
};

</script>

<template>
    <Head title="Quiz" />
    <div
        class="min-h-screen bg-gradient-to-br from-sky-100 to-blue-200 flex items-center justify-center p-6"
    >
        <div class="bg-white rounded-2xl shadow-lg max-w-md w-full p-8">
            <div v-if="!quizCompleted">
                <p class="text-gray-700 mb-4">
                    Question {{ currentQuestionIndex + 1 }} of
                    {{ questions.length }}
                </p>
                <p class="text-gray-800 font-semibold mb-6">
                    {{ questions[currentQuestionIndex].question_text }}
                </p>

                <div class="space-y-4">
                    <div v-for="key in ['A', 'B', 'C', 'D']" :key="key">
                        <label :for="`option-${key}`">
                            <input
                                type="radio"
                                :id="`option-${key}`"
                                :value="key"
                                v-model="selectedOption"
                            />
                            {{
                                questions[currentQuestionIndex][
                                    `option_${key.toLowerCase()}`
                                ]
                            }}
                        </label>
                    </div>
                </div>

                <button
                    @click="submitAnswer"
                    :disabled="!selectedOption"
                    class="mt-6 w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl transition disabled:opacity-50"
                >
                    Submit Answer
                </button>
            </div>

            <div v-else>
                <p class="text-gray-800 font-semibold mb-4">
                    🎉 Quiz Completed!
                </p>
                <p class="text-gray-700">
                    Your Score: {{ score }} / {{ questions.length }}
                </p>
            </div>
        </div>
    </div>
</template>

<style scoped>
/* Add any additional scoped styles here */
</style>
