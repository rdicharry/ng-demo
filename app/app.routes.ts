import {RouterModule, Routes} from "@angular/router";
import {HomeComponent} from "./components/home-component";
import {WeatherComponents} from "./components/weather-components";

export const allAppComponents = [WeatherComponents, HomeComponent];

export const routes: Routes = [
	{path: "weather", component: WeatherComponents},
	{path: "", component: HomeComponent}
];

export const appRoutingProviders: any[] = [];

export const routing = RouterModule.forRoot(routes);