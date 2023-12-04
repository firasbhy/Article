import { Injectable } from '@angular/core';
import{HttpClient, HttpHeaders} from '@angular/common/http';
import { Observable } from 'rxjs';
import { Article } from '../Models/Article';
@Injectable({
  providedIn: 'root'
})
export class ArticleServiceService {

  apiUrl : string = "http://localhost:8070/Backend_Test/apiArticle.php";

  constructor(private http:HttpClient )
   {

    }


      getData(): Observable<Article[]>{
        const headers = new HttpHeaders({
          'Content-Type': 'application/json',
          
        });
        console.log(this.http.get<Article[]>(this.apiUrl));
        return this.http.get<Article[]>(this.apiUrl,{headers});
        }
}
