<?php

namespace Tests\Feature;

use App\Models\Option;
use App\Models\Question;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OptionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_belongs_to_a_question()
    {
        // Create a question
        $question = Question::factory()->create();

        // Create an option that belongs to the question
        $option = Option::factory()->create(['question_id' => $question->id]);

        // Assert that the option belongs to the question
        $this->assertInstanceOf(Question::class, $option->question);
        $this->assertEquals($question->id, $option->question->id);
    }

    /** @test */
    public function it_can_have_multiple_options()
    {
        // Create a question
        $question = Question::factory()->create();

        // Create multiple options for the question
        $options = Option::factory()->count(3)->create(['question_id' => $question->id]);

        // Assert that the question has the correct number of options
        $this->assertCount(3, $question->options);
        $this->assertEquals($options->pluck('id')->toArray(), $question->options->pluck('id')->toArray());
    }
}