package com.moventes.com.imdb;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;
import org.json.JSONTokener;

import java.io.IOException;
import java.util.ArrayList;
import java.util.List;
import java.util.concurrent.ExecutionException;

import okhttp3.HttpUrl;
import okhttp3.Response;

public class MovieAccessor {

    public Movie getMovieById(String id) throws ExecutionException, InterruptedException, IOException, JSONException {
        // On construit l'url à partir de l'entry point
        HttpUrl.Builder urlBuilder = HttpUrl.parse(OMDB_ENTRY_POINT).newBuilder();
        urlBuilder.addQueryParameter("i", id);
        String url = urlBuilder.build().toString();

        // on appel l'AsyncTask
        NetworkRequestLauncher launcher = new NetworkRequestLauncher();
        Response response = launcher.execute(url).get();

        // on récupère le flux JSON dans un objet java permettant d'en récupérer le contenu
        JSONObject object = (JSONObject) new JSONTokener(response.body().string()).nextValue();
        return parseJsonObject(object);
    }

    // constante définissant le point d'entrée de OMDb
    private static String OMDB_ENTRY_POINT = "http://www.omdbapi.com/?apikey=172d5c07";

    public List<Movie> getMoviesByTitle(String title) throws ExecutionException, InterruptedException, IOException, JSONException {
        // On construit l'url à partir de l'entry point
        HttpUrl.Builder urlBuilder = HttpUrl.parse(OMDB_ENTRY_POINT).newBuilder();
        urlBuilder.addQueryParameter("s", title);
        String url = urlBuilder.build().toString();

        // on appel l'AsyncTask
        NetworkRequestLauncher launcher = new NetworkRequestLauncher();
        Response response = launcher.execute(url).get();

        // on récupère le flux JSON dans un objet java permettant d'en récupérer le contenu
        JSONObject object = (JSONObject) new JSONTokener(response.body().string()).nextValue();

        // dans l'objet, on cherche le tableau Search
        JSONArray array = object.getJSONArray("Search");

        // on prépare une liste de Movie qu'on va alimenter avec le contenu de Search
        List<Movie> movies = new ArrayList<Movie>();

        // on parcourt Search
        for (int rank = 0; rank < array.length(); rank++) {
            // Pour chaque entrée de Search, on va construire un Movie et l'ajouter à la liste
            JSONObject item = array.getJSONObject(rank);
            movies.add(parseJsonObject(item));
        }

        // on renvoie la liste construite à partir de Search
        return movies;
    }

    private Movie parseJsonObject(JSONObject item) throws JSONException {
        // On récupère dans l'objet JSON les propriétés à mettre
        return new Movie(
                item.has("imdbID") ? item.getString("imdbID") : null,
                item.has("Title") ? item.getString("Title") : null,
                item.has("Poster") ? item.getString("Poster") : null,
                item.has("Year") ? item.getString("Year") : null,
                item.has("Director") ? item.getString("Director") : null,
                item.has("Actors") ? item.getString("Actors") : null,
                item.has("Plot") ? item.getString("Plot") : null
        );
    }

}
