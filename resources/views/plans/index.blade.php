@extends('layouts.app-dashboard')

@section('header', 'Subscription Plans')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-gray-900">Choose Your Plan</h2>
        <p class="text-gray-600 mt-2">Select the perfect plan for your email marketing needs</p>
        @if(auth()->user()->plan)
            <p class="mt-4 text-sm text-blue-600">
                Current Plan: <strong>{{ auth()->user()->plan->name }}</strong>
            </p>
        @endif
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($plans as $plan)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden border-2 {{ auth()->user()->plan_id == $plan->id ? 'border-blue-500' : 'border-gray-200' }}">
            <div class="p-6">
                <h3 class="text-2xl font-bold text-gray-900">{{ $plan->name }}</h3>
                <p class="text-gray-600 mt-2">{{ $plan->description }}</p>
                <div class="mt-4">
                    <span class="text-4xl font-bold text-gray-900">${{ number_format($plan->price, 2) }}</span>
                    <span class="text-gray-600">/month</span>
                </div>
                <div class="mt-6">
                    <p class="text-gray-700">
                        <svg class="inline-block w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        {{ number_format($plan->email_limit) }} emails per month
                    </p>
                    <p class="text-gray-700 mt-2">
                        <svg class="inline-block w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Email analytics & tracking
                    </p>
                    <p class="text-gray-700 mt-2">
                        <svg class="inline-block w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Rich text editor
                    </p>
                </div>
            </div>
            <div class="p-6 bg-gray-50">
                @if(auth()->user()->plan_id == $plan->id)
                    <button disabled class="w-full bg-gray-400 text-white py-3 rounded-lg font-semibold cursor-not-allowed">
                        Current Plan
                    </button>
                @else
                    <form method="POST" action="{{ route('plans.select', $plan) }}">
                        @csrf
                        <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                            Select Plan
                        </button>
                    </form>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection