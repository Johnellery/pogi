<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class healthtips1 extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Dental Health Tips 1', 'Avoid Smoking and Tobacco Use')
            ->description('Smoking and using tobacco products can stain your teeth, contribute to bad breath, and increase your risk of gum disease, tooth decay, and oral cancer.'),
            Stat::make('Dental Health Tips 2', 'Avoid Excessive Sugary and Acidic Foods')
             ->description('Consuming too many sugary and acidic foods and drinks, such as candies, sodas, and citrus fruits, can erode tooth enamel, leading to cavities and tooth sensitivity.'),
            Stat::make('Dental Health Tips 3', 'Avoid Nail Biting')
            ->description('Biting your nails can chip or break your teeth and irritate the soft tissue inside your mouth. It can also introduce bacteria from your nails into your mouth, increasing the risk of infection.'),
            Stat::make('Dental Health Tips 4', 'Avoid Using Teeth as Tools')
            ->description('Avoid using your teeth to open bottles, tear open packages, or bite down on hard objects like ice cubes or pens. This can damage your teeth, cause chips or cracks, and lead to dental emergencies.'),
            Stat::make('Dental Health Tips 5', 'Avoid Grinding and Clenching')
            ->description('Bruxism, or teeth grinding and clenching, can wear down tooth enamel, cause jaw pain, headaches, and increase the risk of tooth fractures. Stress management techniques and wearing a mouthguard at night can help prevent bruxism-related damage.'),
            Stat::make('Dental Health Tips 6', 'Avoid Ignoring Dental Pain')
            ->description('Ignoring dental pain or discomfort can indicate underlying dental problems such as cavities, gum disease, or infections. Promptly addressing dental issues with your dentist can prevent them from worsening and requiring more extensive treatment.'),
            Stat::make('Dental Health Tips 7', 'Avoid Skipping Dental Checkups')
            ->description('Skipping regular dental checkups and cleanings can allow dental problems to progress undetected. Routine dental visits are essential for maintaining oral health, preventing dental issues, and catching problems early when they are easier to treat.'),
            Stat::make('Dental Health Tips 8', 'Avoid using a Hard-Bristled Toothbrush')
            ->description('Using a toothbrush with hard bristles can be abrasive on your teeth and gums, causing enamel erosion and gum recession over time. Its recommended to use a toothbrush with soft bristles to gently clean your teeth and gums without causing damage.'),

            // ->description('Smoking and Tobacco Use')
            // ->color('success'),
        ];
    }
    public static function canView(): bool
    {
        $user = Auth::user();
        return $user->role->name === 'Patient';
    }
    protected function getcolumns(): int
    {
        return 4;
    }
}
