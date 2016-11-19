import {RouterModule, Routes} from "@angular/router";
import {HomeComponent} from "./components/home-component";
import {WeatherComponent} from "./components/weather-components";

export const allAppComponents = [WeatherComponent, HomeComponent];

export const routes: Routes = [
	{path: "", component: HomeComponent},
	{path: "weather", component: WeatherComponent}
];

export const appRoutingProviders: any[] = [];

export const routing = RouterModule.forRoot(routes);