<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Quote;
use Tests\TestCase;

class QuoteTest extends TestCase {
    public function testQuoteCanBeCreated(): void {
        $this->assertDatabaseCount('quotes', 0);

        $quotes = Quote::factory()->createMany(5);

        foreach ($quotes as $quote) {
            $this->assertModelExists($quote);
        }

        $this->assertDatabaseCount('quotes', 5);
    }

    public function testQuoteCanBeUpdated(): void {
        $this->assertDatabaseCount('quotes', 5);

        $quote = Quote::where('id', 2)->first();
        $quote->quote = 'Some quote';
        $quote->name = 'Some Person';

        $quote->save();

        $this->assertDatabaseHas('quotes', [
            'quote' => 'Some quote',
            'name' => 'Some Person',
        ]);
    }

    public function testQuoteCanBeDeleted(): void {
        $this->assertDatabaseCount('quotes', 5);

        $quote = Quote::where('id', 4)->first();
        $quote->delete();

        $this->assertDatabaseCount('quotes', 4);
        $this->assertDatabaseMissing('quotes', [
            'id' => 4,
        ]);
    }
}
