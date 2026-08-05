<?php

namespace App\Http\Controllers;

use OpenApi\Attributes as OA;

#[OA\Info(
    version: '1.0.0',
    title: 'Languify API',
    description: 'REST API for the Languify language-learning app: auth & onboarding, '
        .'course content, lesson progress & gamification (XP, streak, badges, chests, daily quests), '
        .'avatar, profile, multi-course enrollment, trivia, weekly leagues, Family plan sharing, '
        .'admin-managed ads, and the gem/heart/subscription shop.',
)]
#[OA\Server(url: '/', description: 'API server (paths are relative to this host)')]
#[OA\SecurityScheme(
    securityScheme: 'cookieAuth',
    type: 'apiKey',
    in: 'cookie',
    name: 'access_token',
    description: 'Session cookie set on login/register. Carries a Sanctum token that the '
        .'AuthenticateFromCookie middleware bridges into the Authorization header server-side.',
)]
#[OA\Tag(name: 'Auth', description: 'Registration, login, OTP verification, password reset')]
#[OA\Tag(name: 'Courses', description: 'Language/onboarding selection and course content (chapters/units/lessons/exercises)')]
#[OA\Tag(name: 'Course Enrollment', description: 'Multi-course support: list and switch between enrolled languages')]
#[OA\Tag(name: 'Lesson Progress', description: 'Recording lesson completions (XP, streak, badges, unit bonuses)')]
#[OA\Tag(name: 'Game State', description: 'Hydrated XP/streak/gems/hearts/badges snapshot')]
#[OA\Tag(name: 'Chests', description: 'Daily/streak/unit-bonus chest claims and streak freeze')]
#[OA\Tag(name: 'Avatar', description: 'DiceBear avatar configuration')]
#[OA\Tag(name: 'Profile', description: 'Display name and completed-languages history')]
#[OA\Tag(name: 'Trivia', description: 'Trivia topics, questions, and scored submissions')]
#[OA\Tag(name: 'Shop', description: 'Gem packs, heart refills, and subscription plans (Stripe Checkout)')]
#[OA\Tag(name: 'Subscription', description: 'Current subscription status')]
#[OA\Tag(name: 'Stripe Webhook', description: 'Stripe event receiver (not called by the frontend)')]
#[OA\Tag(name: 'Family', description: "Family plan sharing: invite/accept/remove/leave, up to 5 accounts on one owner's subscription")]
#[OA\Tag(name: 'League', description: 'Weekly league cohort standings and promotion/demotion status')]
#[OA\Tag(name: 'Quests', description: "Adaptive daily quests: today's 3 assignments and reward claiming")]
#[OA\Tag(name: 'Ads', description: 'Admin-managed ad creative pool for the sidebar banner and lesson-complete interstitial')]
#[OA\Tag(name: 'Pages', description: 'Public content pages (Terms, Privacy) — no auth required')]
abstract class Controller
{
    //
}
