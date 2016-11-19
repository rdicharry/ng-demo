import {Injectable} from "@angular/core";
import {Http} from "@angular/http";
import {Observable} from "rxjs/Observable";
import {BaseService} from "./base-service";
// TODO need to define a weather class?
import {Status} from "../classes/status";

@Injectable()
export class WeatherService extends BaseService {
	constructor(protected http: Http){
		super(http);
	}

	private weatherUrl = "/api/weather/"
}