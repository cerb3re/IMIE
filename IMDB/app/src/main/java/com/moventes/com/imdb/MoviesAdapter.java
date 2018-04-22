package com.moventes.com.imdb;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import com.nostra13.universalimageloader.core.ImageLoader;
import com.nostra13.universalimageloader.core.ImageLoaderConfiguration;

import java.util.ArrayList;

public class MoviesAdapter extends ArrayAdapter<Movie> {

    private final Context context;
    private ArrayList<Movie> movies;

    ImageLoader imageLoader = ImageLoader.getInstance();

    public MoviesAdapter(@NonNull Context context, int resource,
                         ArrayList<Movie> movies) {
        super(context, resource, movies);
        this.context = context;
        this.movies = movies;

        imageLoader.init(ImageLoaderConfiguration
                .createDefault(context.getApplicationContext()));
    }

    public ArrayList<Movie> getData() {
        return movies;
    }

    @NonNull
    @Override
    /**
     * Cette méthode est appelée par la liste pour afficher chaque élément
     * La position correspond à l'indice dans la liste
     */
    public View getView(int position, @Nullable View convertView,
                        @NonNull ViewGroup parent) {
        // on récupère un service permettant de créer des vues
        LayoutInflater inflater = (LayoutInflater) context
                .getSystemService(Context.LAYOUT_INFLATER_SERVICE);

        // a l'aide du service, on va créer une vue depuis
        // le layout item_layout
        View rowView = inflater.inflate(R.layout.item_layout, parent, false);

        // dans la vue créée, on cherche la TextView dont
        // l'id title a été défini dans le layout
        TextView textView = (TextView) rowView.findViewById(R.id.title);

        // on va mettre le titre du film correspondant à la position
        // passée en paramètre
        textView.setText(movies.get(position).getTitle());

        // récupérer mon ImageView
        ImageView poster = rowView.findViewById(R.id.poster);

        imageLoader.displayImage(movies.get(position).getPoster(), poster);

        // on renvoie la vue créée et alimentée
        return rowView;
    }
}
